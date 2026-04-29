# Available APIs

The `ACBr` Facade provides a fluent interface to all 15 ACBr API services. Below is a list of all available methods and the corresponding API classes they return.

## Core Services

### NFe (Nota Fiscal Eletrônica)
Interface for issuing, canceling, and managing NFe.
```php
$api = ACBr::nfe(); // Returns ACBrAPI\Api\NfeApi
```

### NFCe (Nota Fiscal de Consumidor Eletrônica)
Interface for consumer receipts.
```php
$api = ACBr::nfce(); // Returns ACBrAPI\Api\NfceApi
```

### NFSe (Nota Fiscal de Serviços Eletrônica)
Interface for service invoices.
```php
$api = ACBr::nfse(); // Returns ACBrAPI\Api\NfseApi
```

### NFCom (Nota Fiscal de Comunicação)
Interface for communication service invoices.
```php
$api = ACBr::nfcom(); // Returns ACBrAPI\Api\NfcomApi
```

---

## Logistics

### CTe (Conhecimento de Transporte Eletrônico)
```php
$api = ACBr::cte(); // Returns ACBrAPI\Api\CteApi
```

### CTe OS (CTe para Outros Serviços)
```php
$api = ACBr::cteOs(); // Returns ACBrAPI\Api\CteOsApi
```

### MDFe (Manifesto Eletrônico de Documentos Fiscais)
```php
$api = ACBr::mdfe(); // Returns ACBrAPI\Api\MdfeApi
```

---

## Utility APIs

### CEP (Zip Code Lookup)
Search for addresses using a Zip Code.
```php
$api = ACBr::cep(); // Returns ACBrAPI\Api\CepApi
```

### CNPJ (Company Lookup)
Search for company data using a CNPJ.
```php
$api = ACBr::cnpj(); // Returns ACBrAPI\Api\CnpjApi
```

### Email
Send fiscal documents via email.
```php
$api = ACBr::email(); // Returns ACBrAPI\Api\EmailApi
```

### Empresa (Company Management)
Manage your company settings in the ACBr API.
```php
$api = ACBr::empresa(); // Returns ACBrAPI\Api\EmpresaApi
```

### Conta (Account Management)
Manage your ACBr API account.
```php
$api = ACBr::conta(); // Returns ACBrAPI\Api\ContaApi
```

---

## Advanced & Support

### Distribuicao NFe (NFe Distribution)
Fetch documents issued against your CNPJ.
```php
$api = ACBr::distribuicaoNfe(); // Returns ACBrAPI\Api\DistribuioNFEApi
```

### DCE (Documento de Cavalo Eletrônico)
```php
$api = ACBr::dce(); // Returns ACBrAPI\Api\DceApi
```

### Debug
Utility for debugging API calls.
```php
$api = ACBr::debug(); // Returns ACBrAPI\Api\DebugApi
```

---

## Database & Integration

### Models

The SDK provides the following models to persist data:
- `ACBr\Laravel\Models\AcbrCompany`: Stores company credentials and metadata.
- `ACBr\Laravel\Models\AcbrDocument`: Stores fiscal documents (NFe, NFSe, etc.).
- `ACBr\Laravel\Models\AcbrSearch`: Stores logs of CEP and CNPJ searches.

### Traits

#### InteractsWithACBr
Add this trait to any model (e.g., `User`, `Tenant`) to link it with ACBr entities.
```php
use ACBr\Laravel\Traits\InteractsWithACBr;

$user->acbrCompany; // Get associated company
$user->acbrDocuments; // Get all documents
```

## Livewire Components

### acbr-cep-lookup
A real-time Zip Code lookup component.
```html
<livewire:acbr-cep-lookup />
```

### acbr-nfe-list
A complete table for listing and filtering NF-e from the database.
```html
<livewire:acbr-nfe-list />
```
