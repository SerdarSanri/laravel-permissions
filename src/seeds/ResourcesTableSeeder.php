<?php

class ResourcesTableSeeder extends Seeder
{

    /* public run() {{{ */
    /**
     * run
     *
     * @access public
     * @return void
     */
    public function run()
    {
        parent::run();

        $routes   = Route::getRoutes();
        $children = [];

        foreach ($routes as $route) {
            list($controller, $action) = explode('@', $route->getActionName());

            $parent = Resource::firstOrCreate(['name' => $controller]);

            $child = [
                'name'      => $route->getName(),
                'action'    => $action,
                'url'       => $route->getPath(),
                'parent_id' => $parent->id
            ];
        }

        DB::table('resources')->insert($children);
    }
    /* }}} */
}
