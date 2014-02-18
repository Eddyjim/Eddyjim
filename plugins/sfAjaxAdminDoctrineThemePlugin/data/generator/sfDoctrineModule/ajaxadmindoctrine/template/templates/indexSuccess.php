[?php use_javascript(sfConfig::get('ajax_admin_doctrine_theme_plugin_web_dir').'/js/ajaxAdminDoctrine_theme.js'); ?]
[?php use_helper('I18N', 'Date') ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/assets') ?]

<div id="sf_admin_container">
  <h1 id="sf_admin_title_list">[?php echo <?php echo $this->getI18NString('list.title') ?> ?]</h1>
  <h1 id="sf_admin_title_new"></h1>
  <h1 id="sf_admin_title_edit"></h1>

  <div id="sf_admin_flashes">
  [?php include_partial('<?php echo $this->getModuleName() ?>/flashes') ?]
  </div>

  <div id="sf_admin_header">
   <div id="sf_admin_header_list">
    [?php include_partial('<?php echo $this->getModuleName() ?>/list_header', array('pager' => $pager)) ?]
   </div>
   <div id="sf_admin_header_new_edit">
    [?php include_partial('<?php echo $this->getModuleName() ?>/form_header', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration)) ?]
   </div>
  </div>

  <div id="sf_ajax_spinner">
   [?php echo image_tag(sfConfig::get('ajax_admin_doctrine_theme_plugin_web_dir').'/images/ajax-loader.gif', array('id'=>'sf_ajax_spinner_img')) ?]
  </div>

<?php if ($this->configuration->hasFilterForm()): ?>
  <div id="sf_admin_bar">
    [?php include_partial('<?php echo $this->getModuleName() ?>/filters', array('form' => $filters, 'configuration' => $configuration)) ?]
  </div>
<?php endif; ?>

  <div id="sf_admin_content">
   <div id="sf_admin_content_list">
<?php if ($this->configuration->getValue('list.batch_actions')): ?>
    <form action="[?php echo url_for('<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'batch')) ?]" method="post">
<?php endif; ?>
    [?php include_partial('<?php echo $this->getModuleName() ?>/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?]
    <ul class="sf_admin_actions">
      [?php include_partial('<?php echo $this->getModuleName() ?>/list_batch_actions', array('helper' => $helper)) ?]
      [?php include_partial('<?php echo $this->getModuleName() ?>/list_actions', array('helper' => $helper)) ?]
    </ul>
<?php if ($this->configuration->getValue('list.batch_actions')): ?>
    </form>
<?php endif; ?>
   </div>
   <div id="sf_admin_content_new_edit">
    [?php include_partial('<?php echo $this->getModuleName() ?>/form', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?]
   </div>
  </div>

  <div id="sf_admin_footer">
   <div id="sf_admin_footer_list">
    [?php include_partial('<?php echo $this->getModuleName() ?>/list_footer', array('pager' => $pager)) ?]
   </div>
   <div id="sf_admin_footer_new_edit">
    [?php include_partial('<?php echo $this->getModuleName() ?>/form_footer', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration)) ?]
   </div>
  </div>
</div>
