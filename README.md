# ProcyonWP

ProcyonWP is a collection of useful traits for WordPress development.

## Installation

Add to your composer.json

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/nicolasgalvez/ProcyonWP"
        }
    ],
    "require": {
        "procyon/procyonwp": "dev-main"
    }
}
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
