<?php
foreach ($employees as $employee) {
    echo '<tr>';
    echo '<td>' . $employee['name'] . '</td>';
    echo '<td>' . $employee['surname'] . '</td>';
    echo '<td>' . $employee['email'] . '</td>';
    echo '<td>' . $employee['phone'] . '</td>';
    echo '<td>' . $employee['birthdate'] . '</td>';
    echo '<td>' . $employee['address'] . '</td>';
    echo '<td>' . $employee['salary'] . '</td>';
    echo '<td>' . $employee['created_at'] . '</td>';
    echo '<td>' . $employee['updated_at'] . '</td>';
    echo '<td>
            <div class="btn-group" role="group" aria-label="Azioni">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editEmployeeModal" 
                data-id="' . $employee['id'] . '" 
                data-name="' . $employee['name'] . '"
                data-surname="' . $employee['surname'] . '"
                data-email="' . $employee['email'] . '"
                data-phone="' . $employee['phone'] . '"
                data-birthdate="' . $employee['birthdate'] . '"
                data-address="' . $employee['address'] . '"
                data-salary="' . $employee['salary'] . '">Modifica</button>
                
                <a href="index.php?delete=' . $employee['id'] . '" class="btn btn-danger">Elimina</a>
            </div>
          </td>';
    echo '</tr>';
}
?>
