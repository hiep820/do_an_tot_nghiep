<?php


function showError($errors, $name){
	if ($errors->has($name)) {
		return '
			<div class="alert bg-danger" role="alert">
				<svg class="glyph stroked cancel">
					<use xlink:href="#stroked-cancel"></use>
				</svg>'.$errors->first($name).'
			</div>
		';

	}
}

function getCategory($arr, $parent, $shift, $id_select){
	foreach ($arr as $value) {
		if($value['parent'] == $parent){
			if($value['id'] == $id_select){
				echo "<option value=".$value['id']." selected>".$shift.$value['name']."</option>";
			}else{
				echo "<option value=".$value['id'].">".$shift.$value['name']."</option>";
			}
			getCategory($arr, $value['id'], $shift.'---|', $id_select);
		}
	}
}

function showCategory($arr, $parent, $shift){
	foreach ($arr as $value) {
		if($value['parent'] == $parent){
			echo '<div class="item-menu"><span>'.$shift.$value['name'].'</span>
					<div class="category-fix">
						<a class="btn-category btn-primary" href="/admin/category/edit/'.$value['id'].'"><i class="fa fa-edit"></i></a>
						<a onClick="return del_category()" class="btn-category btn-danger" href="/admin/category/del/'.$value['id'].'"><i class="fas fa-times"></i></i></a>

					</div>
				</div>';
			showCategory($arr, $value['id'], $shift.'---|');
		}
	}
}

function getLevel($arr, $parent, $count){
	foreach ($arr as $value) {
		if($value['id'] == $parent){
			$count++;
			if($value['parent'] == 0){
				return $count;
			}
			return getLevel($arr, $value['parent'], $count);
		}
	}
}
