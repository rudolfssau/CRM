# CRM Sistema

Laravel Filament CRM sistēma.

## Instalācija

1. Klonē projektu:
```bash
git clone [url]
cd laravel-crm
```

2. Instalē dependencies:
```bash
./vendor/bin/sail composer install
```

3. Kopē .env failu:
```bash
cp .env.example .env
```

4. Ģenerē app key:
```bash
./vendor/bin/sail artisan key:generate
```

5. Palaidi migrācijas:
```bash
./vendor/bin/sail artisan migrate --seed
```

6. Izveido admin lietotāju:
```bash
./vendor/bin/sail artisan make:filament-user
```

7. Atvēr: http://localhost/admin
