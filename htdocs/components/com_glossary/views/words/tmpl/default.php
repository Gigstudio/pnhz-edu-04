<?php
/**
 * @version     1.0.0
 * @package     com_glossary
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      salauat <sala.sdu@gmail.com> - http://pnhz.kz
 */
// no direct access
defined('_JEXEC') or die;
?>
<script type="text/javascript">
    function deleteItem(item_id){
        if(confirm("<?php echo JText::_('COM_GLOSSARY_DELETE_MESSAGE'); ?>")){
            document.getElementById('form-word-delete-' + item_id).submit();
        }
    }
</script>

<div class="page-header">
	<h2>Глоссарий</h2>
</div>

<style>
.accordion-inner {
	padding-left:30px;
	padding-right:30px;
	color:#666;
	background-color:#FFF8E1;
}

.accordion-heading a {
	font-size:14px;
	font-weight:bold;
	color:#0088CC;
}
</style>

<div class="accordion" id="accordion2">
	<?php $show = false; ?>
    <?php foreach ($this->items as $item) : ?>
    		<?php
            	if($item->state == 1 || ($item->state == 0 && JFactory::getUser()->authorise('core.edit.own',' com_glossary'))):
            	$show = true;
            ?>
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?php echo $item->id; ?>">
                        <?php echo $item->word; ?>
                    </a>
                </div>
                <div id="collapse<?php echo $item->id; ?>" class="accordion-body <?php if (JRequest::getVar('wid')!= $item->id) {echo 'collapse';} ?>">
                    <div class="accordion-inner">
                        <?php echo $item->desc; ?>
                    </div>
                </div>
            </div>
            <?php
            	endif;
			?>

	<?php endforeach; ?>
	<?php
    if (!$show):
        echo JText::_('COM_GLOSSARY_NO_ITEMS');
    endif;
    ?>
</div>

<?php if ($show): ?>
    <div class="pagination" align="center">
        <p class="counter" style="font-size:11px; color:#666;">
            <?php echo $this->pagination->getPagesCounter(); ?>
        </p>
        <?php echo $this->pagination->getPagesLinks(); ?>
    </div>
<?php endif; ?>

