<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once(dirname(__FILE__).'/sfPropelBaseTask.class.php');

/**
 * Create SQL for the current model.
 *
 * @package    symfony
 * @subpackage propel
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfPropelBuildSqlTask.class.php 12141 2008-10-11 12:33:03Z fabien $
 */
class sfPropelBuildSqlTask extends sfPropelBaseTask
{
  /**
   * @see sfTask
   */
  protected function configure()
  {
    $this->addOptions(array(
      new sfCommandOption('phing-arg', null, sfCommandOption::PARAMETER_REQUIRED | sfCommandOption::IS_ARRAY, 'Arbitrary phing argument'),
    ));

    $this->aliases = array('propel-build-sql');
    $this->namespace = 'propel';
    $this->name = 'build-sql';
    $this->briefDescription = 'Creates SQL for the current model';

    $this->detailedDescription = <<<EOF
The [propel:build-sql|INFO] task creates SQL statements for table creation:

  [./symfony propel:build-sql|INFO]

The generated SQL is optimized for the database configured in [config/propel.ini|COMMENT]:

  [propel.database = mysql|INFO]
EOF;
  }

  /**
   * @see sfTask
   */
  protected function execute($arguments = array(), $options = array())
  {
    $this->schemaToXML(self::DO_NOT_CHECK_SCHEMA, 'generated-');
    $this->copyXmlSchemaFromPlugins('generated-');
    $ret = $this->callPhing('sql', self::CHECK_SCHEMA);
    $this->cleanup();
///// FIXME: must change the propel.ini based on databases.yml! as done in insert-sql
    return !$ret;
  }
}