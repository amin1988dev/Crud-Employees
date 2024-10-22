<form action="index.php" method="POST" class="mb-4">
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
    <input type="date" name="birthdate" class="form-control" required>
</div>
<div class="form-group">
    <label for="address">Indirizzo</label>
    <input type="text" name="address" class="form-control" required>
</div>
<div class="form-group">
    <label for="tax_code">Codice Fiscale</label>
    <input type="text" name="tax_code" class="form-control" required>
</div>
<div class="form-group">
    <label for="job_position">Posizione lavorativa</label>
    <input type="text" name="job_position" class="form-control" required>
</div>
<div class="form-group">
    <label for="hire_date">Data di assunzione</label>
    <input type="date" name="hire_date" class="form-control" required>
</div>
<div class="form-group">
    <label for="salary">Stipendio</label>
    <input type="number" step="0.01" name="salary" class="form-control" required>
</div>
<div class="form-group">
    <label for="employee_number">Numero di matricola</label>
    <input type="text" name="employee_number" class="form-control" required>
</div>
<div class="form-group">
    <label for="employment_status">Stato occupazionale</label>
    <select name="employment_status" class="form-control" required>
        <option value="attivo">Attivo</option>
        <option value="sospeso">Sospeso</option>
        <option value="licenziato">Licenziato</option>
    </select>
</div>
<div class="form-group">
    <label for="emergency_contact">Numero di emergenza</label>
    <input type="text" name="emergency_contact" class="form-control" required>
</div>

    <button type="submit" class="btn btn-primary">Aggiungi Dipendente</button>
</form>
