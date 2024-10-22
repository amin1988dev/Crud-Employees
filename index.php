<?php
include_once 'db.php'; 
include_once 'controllers/EmployeeController.php';

$employeeController = new EmployeeController($pdo);

$search = isset($_GET['search']) ? $_GET['search'] : '';

// Impostazioni per la paginazione
$limit = 5; 
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Pagina corrente
$offset = ($page - 1) * $limit; // Calcola l'offset
$totalEmployees = $employeeController->countEmployees($search); // Conteggio totale dei dipendenti
$totalPages = ceil($totalEmployees / $limit); // Calcola il numero di pagine

$showAddModal = false;  
$showEditModal = false; 
$editEmployee = null;   
$success = false;       
$errors = [];           // Variabile che contiene gli errori

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        // Aggiornamento del dipendente
        $success = $employeeController->updateEmployee(
            $_POST['id'],
            $_POST['name'], 
            $_POST['surname'], 
            $_POST['email'], 
            $_POST['phone'], 
            $_POST['birthdate'], 
            $_POST['address'], 
            $_POST['salary']
        );
        if (!$success) {
            $showEditModal = true;  // Se c'è un errore, mostra la modale di modifica
            $editEmployee = $employeeController->getEmployeeById($_POST['id']); // Mantieni i dati del record se l'aggiornamento fallisce
            $errors = $employeeController->errors; // Recupera gli errori
        }
    } else {
        // Creazione di un nuovo dipendente
        $success = $employeeController->createEmployee(
            $_POST['name'], 
            $_POST['surname'], 
            $_POST['email'], 
            $_POST['phone'], 
            $_POST['birthdate'], 
            $_POST['address'], 
            $_POST['salary']
        );
        if (!$success) {
            $showAddModal = true; 
            $errors = $employeeController->errors; 
        }
    }

    if ($success) {
        echo "<script>window.location.href = 'index.php';</script>";
        exit();
    }
} elseif (isset($_GET['delete'])) {
    
    $employeeController->deleteEmployee($_GET['delete']);
    header("Location: index.php");
    exit();
} elseif (isset($_GET['edit'])) {
    
    $editEmployee = $employeeController->getEmployeeById($_GET['edit']);
    $showEditModal = true; 
}


$employees = $employeeController->listEmployees($search, $limit, $offset);

include 'views/header.php';
?>

<!-- Barra di ricerca -->
<div class="row mb-3">
    <div class="col-md-6">
        <form action="index.php" method="GET" class="form-inline">
            <input type="text" name="search" class="form-control mr-2" placeholder="Cerca per nome, cognome, email, telefono..." value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit" class="btn btn-primary">Cerca</button>
        </form>
    </div>
    <div class="col-md-6 text-right">
        <button class="btn btn-success" data-toggle="modal" data-target="#addEmployeeModal">Aggiungi Dipendente</button>
    </div>
</div>

<!-- Elenco dei dipendenti -->
<?php if (count($employees) > 0): ?>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Data di Nascita</th>
                <th>Indirizzo</th>
                <th>Stipendio</th>
                <th>Data di Creazione</th>
                <th>Ultima Modifica</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'views/employee_list.php'; ?>
        </tbody>
    </table>
<?php else: ?>
    <p class="text-center">Nessun dipendente trovato.</p>
<?php endif; ?>

<!-- Include le modali -->
<?php include 'views/modals.php'; ?>


<!-- Paginazione -->
<?php if ($totalPages > 1): ?>
<nav aria-label="Navigazione pagine">
  <ul class="pagination justify-content-center">
    <?php if ($page > 1): ?>
      <li class="page-item">
        <a class="page-link" href="?page=<?php echo $page - 1; ?>&search=<?php echo htmlspecialchars($search); ?>">Precedente</a>
      </li>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
      <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
        <a class="page-link" href="?page=<?php echo $i; ?>&search=<?php echo htmlspecialchars($search); ?>"><?php echo $i; ?></a>
      </li>
    <?php endfor; ?>

    <?php if ($page < $totalPages): ?>
      <li class="page-item">
        <a class="page-link" href="?page=<?php echo $page + 1; ?>&search=<?php echo htmlspecialchars($search); ?>">Successiva</a>
      </li>
    <?php endif; ?>
  </ul>
</nav>
<?php endif; ?>


<?php include 'views/footer.php'; ?>

<!-- Script per riaprire la modale in caso di errori e pulizia -->
<script>
    $(document).ready(function () {
        <?php if ($showAddModal): ?>
            $('#addEmployeeModal').modal('show');
        <?php elseif ($showEditModal): ?>
            $('#editEmployeeModal').modal('show');
        <?php endif; ?>
    });

    // Pulire errori quando le modali vengono chiuse
    $('#addEmployeeModal, #editEmployeeModal').on('hidden.bs.modal', function () {
        $(this).find('.alert-danger').remove(); 
        $(this).find('input').val(''); 
    });
</script>
