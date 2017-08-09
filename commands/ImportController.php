<?php
/**
 * @copyright Copyright (c) 2017 SteveSimpson
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use app\models\Scan;
use app\models\Project;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Steve Simpson <software@lcsas.us>
 * @since 2.0
 */
class ImportController extends Controller
{
    /**
     * Usage
     */
    public function actionIndex()
    {
        echo "Usage:\n";
        echo "  ./yii import/zap \$filename -- import a ZAP scan\n\n";
    }
    
    
    public function actionZap($project, $filename)
    {
        if (preg_match('/^[0-9]+$/', $project)) {
            $proj = Project::findOne(['id'=>$project]);
        } else {
            $proj = Project::findOne(['name'=>$project]);
        }
        
        if ($proj) {
            $projectId = $proj->id;
        } else {
            echo "ERROR: Did not find project: ".$project ."\n\n";
            return -1;
        }
        
        $xmlstring = file_get_contents($filename);
        
        $scan = Scan::createScanFromZapXml($projectId, $xmlstring);
        
        if ($scan) {
            echo "Imported.\n";
        } else {
            echo "ERROR Importing.\n";
        }
    }
}
