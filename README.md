# ProcyonWP

ProcyonWP is a collection of useful traits for WordPress development.

## Installation

You can install the package via Composer:

```bash
composer require procyon/procyonwp
```

## Usage
```php
use ProcyonWP\Traits\DisableCommentsTrait;

class MyClass {
    use DisableCommentsTrait;

    public function __construct() {
        $this->initDisableComments();
    }
}

// Instantiate your class to apply the changes
new MyClass();

```