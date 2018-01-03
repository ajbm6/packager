<?php

namespace CleaniqueCoders\Console\Tests\Commands;

use Symfony\Component\Console\Tester\CommandTester;

/**
 * Root directory file content test.
 */
class RootDirectoryFileContentTest extends SkeletonCommandTest
{
    /** @test */
    public function skeleton_command_creates_composer_json_file_with_correct_content()
    {
        $this->commandTester->execute([
            'command' => $this->command->getName(),
            'vendor'  => 'Cleanique Coders',
            'package' => 'My Console',
        ]);

        $this->assertFileExists('cleanique-coders/my-console/composer.json');

        $composerJsonContent = "{
    \"name\": \"cleanique-coders/my-console\",
    \"description\": \"Built with Laravel Standalone Package Creator\",
    \"license\": \"MIT\",
    \"authors\": [
        {
            \"name\": \"Nasrul Hazim\",
            \"email\": \"nasrulhazim.m@gmail.com\"
        }
    ],
    \"autoload\": {
        \"psr-4\": {
            \"CleaniqueCoders\\\\MyConsole\\\\\": \"src/\"
        },
        \"files\": [
            \"src/Support/helpers.php\"
        ]
    },
    \"autoload-dev\": {
        \"psr-4\": {
            \"CleaniqueCoders\\\\MyConsole\\\\Tests\\\\\": \"tests/\"
        }
    },
    \"require\": {
        \"illuminate/support\": \"^5.5\"
    },
    \"require-dev\": {
        \"phpunit/phpunit\": \"^6.5\",
        \"orchestra/testbench\": \"~3.0\",
        \"codedungeon/phpunit-result-printer\": \"^0.4.4\"
    },
    \"config\": {
        \"sort-packages\": true
    },
    \"minimum-stability\": \"dev\",
    \"prefer-stable\": true
}";
        $this->assertEquals($composerJsonContent, file_get_contents('cleanique-coders/my-console/composer.json'));
    }

    /** @test */
    public function skeleton_command_creates_readme_md_file_with_correct_content()
    {
        $this->commandTester->execute([
            'command' => $this->command->getName(),
            'vendor'  => 'Cleanique Coders',
            'package' => 'My Console',
        ]);

        $this->assertFileExists('cleanique-coders/my-console/README.md');

        $readmeMdContent = "## About Your Package

Tell people about your package

## Installation

1. In order to install PackageName in your Laravel project, just run the *composer require* command from your terminal:

```
composer require cleanique-coders/my-console
```

2. Then in your `config/app.php` add the following to the providers array:

```php
CleaniqueCoders\MyConsole\MyConsoleServiceProvider::class,
```

3. In the same `config/app.php` add the following to the aliases array:

```php
'PackageName' => CleaniqueCoders\MyConsole\MyConsoleFacade::class,
```

## Usage

## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).";

        $this->assertEquals($readmeMdContent, file_get_contents('cleanique-coders/my-console/README.md'));
    }
}
