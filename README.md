# Crud-Employees

Progetto di gestione CRUD (Create, Read, Update, Delete) per i dipendenti, realizzato in **PHP senza framework**.

## Funzionalità
- Aggiungere, modificare, eliminare e cercare dipendenti.
- Validazione dei campi con gestione degli errori.
- Paginazione dei risultati.
- Gestione degli errori direttamente nelle modali.
- UI responsive e accattivante grazie a Bootstrap.

## Requisiti
- **PHP** >= 7.4
- **MySQL** per il database
- **Bootstrap 4.5** per lo stile front-end

## Istruzioni per l'installazione

1. **Clona il repository**:
   ```bash
   git clone https://github.com/<tuo-username>/Crud-Employees.git

2. **Configura il database:**
    Crea un database MySQL chiamato crud_employees.
    Importa il file db.sql (se presente) nel tuo database per creare le tabelle.
    Aggiorna le credenziali di connessione nel file db.php

    ```bash
        $host = 'localhost';
        $db = 'crud_employees';
        $user = 'tuo-utente';
        $pass = 'tua-password';

