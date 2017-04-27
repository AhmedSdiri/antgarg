<form action="../items/add" method="post">
<input type="text" value="I have to..." onclick="this.value=''" name="todo"> <input type="submit" value="add">
</form>
<br/><br/>
<?php $number = 0?>
 
<?php foreach ($todo as $todoitem):?>
    <a class="big" href="../items/view/<?php echo $todoitem&#91;'Item'&#93;&#91;'id'&#93;?>/<?php echo strtolower(str_replace(" ","-",$todoitem&#91;'Item'&#93;&#91;'item_name'&#93;))?>">
    <span class="item">
    <?php echo ++$number?>
    <?php echo $todoitem&#91;'Item'&#93;&#91;'item_name'&#93;?>
    </span>
    </a><br/>
<?php endforeach?>