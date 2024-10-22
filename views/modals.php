<!-- Modale per aggiungere un nuovo dipendente -->
<div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="index.php" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="addEmployeeModalLabel">Aggiungi Dipendente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Mostra errori nella modale di aggiunta -->
          <?php if ($showAddModal && !empty($employeeController->errors)): ?>
              <div class="alert alert-danger">
                  <ul>
                      <?php foreach ($employeeController->errors as $error): ?>
                          <li><?php echo $error; ?></li>
                      <?php endforeach; ?>
                  </ul>
              </div>
          <?php endif; ?>

          <div class="form-group">
              <label for="name">Nome</label>
              <input type="text" name="name" class="form-control" required>
          </div>
          <div class="form-group">
              <label for="surname">Cognome</label>
              <input type="text" name="surname" class="form-control" required>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" required>
          </div>
          <div class="form-group">
              <label for="phone">Telefono</label>
              <input type="text" name="phone" class="form-control">
          </div>
          <div class="form-group">
              <label for="birthdate">Data di nascita</label>
              <input type="date" name="birthdate" class="form-control">
          </div>
          <div class="form-group">
              <label for="address">Indirizzo</label>
              <input type="text" name="address" class="form-control">
          </div>
          <div class="form-group">
              <label for="salary">Stipendio</label>
              <input type="number" step="0.01" name="salary" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
          <button type="submit" class="btn btn-primary">Aggiungi Dipendente</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modale per la modifica dei dipendenti -->
<div class="modal fade" id="editEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="editEmployeeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="index.php" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="editEmployeeModalLabel">Modifica Dipendente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Mostra errori nella modale di modifica -->
          <?php if ($showEditModal && !empty($employeeController->errors)): ?>
              <div class="alert alert-danger">
                  <ul>
                      <?php foreach ($employeeController->errors as $error): ?>
                          <li><?php echo $error; ?></li>
                      <?php endforeach; ?>
                  </ul>
              </div>
          <?php endif; ?>

          <input type="hidden" name="id" id="edit-id">
          <div class="form-group">
              <label for="name">Nome</label>
              <input type="text" name="name" id="edit-name" class="form-control" required>
          </div>
          <div class="form-group">
              <label for="surname">Cognome</label>
              <input type="text" name="surname" id="edit-surname" class="form-control" required>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" id="edit-email" class="form-control" required>
          </div>
          <div class="form-group">
              <label for="phone">Telefono</label>
              <input type="text" name="phone" id="edit-phone" class="form-control">
          </div>
          <div class="form-group">
              <label for="birthdate">Data di nascita</label>
              <input type="date" name="birthdate" id="edit-birthdate" class="form-control">
          </div>
          <div class="form-group">
              <label for="address">Indirizzo</label>
              <input type="text" name="address" id="edit-address" class="form-control">
          </div>
          <div class="form-group">
              <label for="salary">Stipendio</label>
              <input type="number" step="0.01" name="salary" id="edit-salary" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
          <button type="submit" class="btn btn-primary">Salva Modifiche</button>
        </div>
      </form>
    </div>
  </div>
</div>
