# PimpMyLog - CakePHP 4.x

PimpMyLog è un'applicazione web basata su CakePHP 4.x pensata per la gestione e visualizzazione dei log di sistema in modo semplice e intuitivo.

## Funzionalità principali
- Visualizzazione dei log in tempo reale
- Filtri e ricerca avanzata
- Interfaccia responsive e personalizzabile
- Supporto a più file di log
- Sicurezza tramite autenticazione

## Requisiti
- PHP >= 7.2
- Estensioni PHP richieste da CakePHP (intl, mbstring, pdo, ecc.)
- Composer

## Installazione
1. Clona il repository:
   ```bash
   git clone <url-del-repo> pimpmylog
   cd pimpmylog
   ```
2. Installa le dipendenze:
   ```bash
   composer install
   ```
3. Configura il database e altri parametri in `config/app_local.php`.
4. Avvia il server di sviluppo:
   ```bash
   bin/cake server -p 8765
   ```
   Visita [http://localhost:8765](http://localhost:8765) per accedere all'applicazione.

## Struttura del progetto
- `src/` - Codice sorgente dell'applicazione (Controller, Model, View)
- `config/` - File di configurazione
- `templates/` - Template delle viste
- `webroot/` - File pubblici (css, js, immagini)
- `logs/` - File di log generati dall'applicazione
- `tests/` - Test automatici

## Configurazione
Modifica `config/app_local.php` per:
- Impostare le credenziali del database
- Configurare percorsi dei log
- Personalizzare altri parametri

## Esecuzione dei test
Per eseguire i test:
```bash
vendor/bin/phpunit
```

## Linting e analisi statica
- Linting: `vendor/bin/phpcs`
- Analisi statica: `vendor/bin/phpstan analyse`

## Contribuire
1. Forka il repository
2. Crea un branch per la tua feature/fix
3. Invia una pull request

## Licenza
Questo progetto è distribuito sotto licenza MIT.

## Riferimenti
- [CakePHP](https://cakephp.org)
- [Documentazione CakePHP](https://book.cakephp.org/4/it/index.html)

---
Per domande o supporto, apri una issue su GitHub.
