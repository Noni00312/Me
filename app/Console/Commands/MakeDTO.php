<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeDTO extends Command
{
    protected $signature = 'make:dto {name}';
    protected $description = 'Create a new DTO class';

    public function handle()
    {
        $name = $this->argument('name');
        $path = app_path("DTOs/{$name}.php");
        
        // Create DTOs directory if it doesn't exist
        if (!File::isDirectory(app_path('DTOs'))) {
            File::makeDirectory(app_path('DTOs'), 0755, true);
        }
        
        // Check if file already exists
        if (File::exists($path)) {
            $this->error("DTO {$name} already exists!");
            return 1;
        }
        
        // Create the DTO file
        $stub = $this->getStub($name);
        File::put($path, $stub);
        
        $this->info("DTO {$name} created successfully at app/DTOs/{$name}.php");
        return 0;
    }
    
    protected function getStub($name)
    {
        return <<<PHP
<?php

namespace App\DTOs;

readonly class {$name}
{
    public function __construct(
        // Add your properties here
        public string \$example,
    ) {}
    
    public static function fromRequest(\$request): self
    {
        return new self(
            example: \$request->example,
        );
    }
    
    public static function fromModel(\$model): self
    {
        return new self(
            example: \$model->example,
        );
    }
    
    public function toArray(): array
    {
        return [
            'example' => \$this->example,
        ];
    }
}
PHP;
    }
}