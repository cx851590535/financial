<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Config;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Composer;

class CreatFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:file {repository} {--model=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new file class';

    protected $type = 'Business';

    private $className = '';
    private $extendName = '';
    private $nameSpace = '';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Filesystem $filesystem, Composer $composer)
    {
        parent::__construct();

        $this->files    = $filesystem;
        $this->composer = $composer;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        //获取repository和model两个参数值
        $argument = $this->argument('repository');
        $option   = $this->option('model');
        //自动生成RepositoryService和Repository文件
        $this->writeRepositoryAndService($argument, $option);
        //重新生成autoload.php文件
        $this->composer->dumpAutoloads();
    }

    private function writeRepositoryAndService($repository, $model)
    {
        if($this->createRepository($repository, $model)){
            //若生成成功,则输出信息
            $this->info('Success to make a '.ucfirst($repository).' Repository and a '.ucfirst($repository).'Class');
        }
    }

    private function createRepository($repository, $model)
    {
        // getter/setter 赋予成员变量值
        //$this->setRepository($repository);
        //$this->setModel($model);
        // 创建文件存放路径, RepositoryService放在app/Repositories,Repository个人一般放在app/Repositories/Eloquent里
        $this->createDirectory($repository);
        // 生成文件
        return $this->createClass($repository);
        //return 'CreatSucess';
    }

    private function createDirectory($repository)
    {
        $directory = $this->getDirectory($repository);
        //检查路径是否存在,不存在创建一个,并赋予775权限
        if(! $this->files->isDirectory($directory)){
            return $this->files->makeDirectory($directory, 0755, true);
        }
    }

    private function getDirectory($repository)
    {
        $dirName = 'App';
        if(strpos($repository,'/')){
            $dir = explode('/',$repository);
            $dirName .= '\\'.$dir[0];
            $this->extendName = $dir[0];
            $this->className = $dir[1].$dir[0];
        }elseif (strpos($repository,'\\')){
            $dir = explode('\\',$repository);
            $dirName .= '\\'.$dir[0];
            $this->extendName = $dir[0];
            $this->className = $dir[1].$dir[0];
        }
        $this->nameSpace = $dirName;

        return $dirName;
    }

    private function createClass($repository)
    {
        //渲染模板文件,替换模板文件中变量值
        $className = '';
        if(strpos($repository,'/')){
            $dir = explode('/',$repository);
            $className = $dir[0];
        }elseif (strpos($repository,'\\')){
            $dir = explode('\\',$repository);
            $className = $dir[0];
        }
        $className = $repository.$className.'.php';
        $templates = $this->templateStub();
        $class     = $this->files->put(app_path($className), $templates);
        return $class;
    }

    private function templateStub()
    {
        // 获取两个模板文件
        $stubs        = $this->getStub();
        // 获取需要替换的模板文件中变量
        $templateData = $this->getTemplateData();
        $renderStubs  = $this->getRenderStub($templateData, $stubs);
        /*foreach ($stubs as $key => $stub) {
            // 进行模板渲染
            $renderStubs[$key] = $this->getRenderStub($templateData, $stub);
        }*/
        return $renderStubs;
    }

    private function getStub()
    {
        $stubs = $this->files->get(app_path('Stub/class.stub'));
        /*$stubs = [
            'Eloquent'  => $this->files->get(resource_path('stubs/Repository').DIRECTORY_SEPARATOR.'Eloquent'.DIRECTORY_SEPARATOR.'repository.stub'),
            'Business' => $this->files->get(resource_path('stubs/Repository').DIRECTORY_SEPARATOR.'repository_service.stub'),
        ];*/
        return $stubs;
    }

    private function getTemplateData()
    {
        $namespace                    = $this->nameSpace;
        $className                    = $this->className;
        $extendName                   = $this->extendName;

        $templateVar = [
            'DummyNamespace'           => $namespace,
            'DummyClass'               => $className,
            'DummyExtends'             => $extendName,
            'date'                     => date('Y/m/d',time()),
            'time'                     => date('H:i:s',time()),
        ];

        return $templateVar;
    }




    private function getRenderStub($templateData, $stub)
    {
        foreach ($templateData as $search => $replace) {
            $stub = str_replace('$'.$search, $replace, $stub);
        }

        return $stub;
    }

   /* private function getPath($class)
    {
        // 两个模板文件,对应的两个路径
        $path = null;
        switch($class){
            case 'Eloquent':
                $path = $this->getDirectory().DIRECTORY_SEPARATOR.$this->getRepositoryName().'.php';
                break;
            case 'Business':
                $path = $this->getServiceDirectory().DIRECTORY_SEPARATOR.$this->getServiceName().'.php';
                break;
        }

        return $path;
    }

    private function getServiceDirectory()
    {
        return Config::get('repository.directory_path');
    }

    private function getRepositoryName()
    {
        // 根据输入的repository变量参数,是否需要加上'Repository'
        $repositoryName = $this->getRepository();
        if((strlen($repositoryName) < strlen('Repository')) || strrpos($repositoryName, 'Repository', -11)){
            $repositoryName .= 'Repository';
        }
        return $repositoryName;
    }

    private function getServiceName()
    {
        return $this->getRepositoryName().'Business';
    }*/

    /**
     * @return mixed

    public function getRepository()
    {
        return $this->repository;
    }*/

    /**
     * @param mixed $repository

    public function setRepository($repository)
    {
        $this->repository = $repository;
    }*/

    /**
     * @return mixed

    public function getModel()
    {
        return $this->model;
    }*/

    /**
     * @param mixed $model

    public function setModel($model)
    {
        $this->model = $model;
    }*/



  /*  private function getModelName()
    {
        $modelName = $this->getModel();
        if(isset($modelName) && !empty($modelName)){
            $modelName = ucfirst($modelName);
        }else{
            // 若option选项没写,则根据repository来生成Model Name
            $modelName = $this->getModelFromRepository();
        }

        return $modelName;
    }

    private function getModelFromRepository()
    {
        $repository = strtolower($this->getRepository());
        $repository = str_replace('repository', '', $repository);
        return ucfirst($repository);
    }*/
}
