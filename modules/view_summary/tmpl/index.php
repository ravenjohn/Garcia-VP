<?php
	defined('AUTH') or die;
	$year = date("Y");
	$month = date("m");
	$day = date("d");
?>
<div id="view_summary_div" class="module none">
	<form class="form" method="POST" action="<?php echo RConfig::ajax_url;?>view_summary" onsubmit="return viewSummary(this);">
		<select name="year" id="year">
			<?php for($i="2013"; $i<=$year; $i++){?>
					<option value='<?php echo $i;?>' <?php if($year == $i){?>selected<?php }?>><?php echo $i;?></option>
			<?php }?>
		</select>		
		<div class="input-prepend">
			<input type="checkbox" id="yearOnly" class="add-on"/>
			<select name="month" id="month" disabled="disabled">
				<option value="01"  <?php if($month==1) echo "selected";?>>January</option>
				<option value="02"  <?php if($month==2) echo "selected";?>>February</option>
				<option value="03"  <?php if($month==3) echo "selected";?>>March</option>
				<option value="04"  <?php if($month==4) echo "selected";?>>April</option>
				<option value="05"  <?php if($month==5) echo "selected";?>>May</option>
				<option value="06"  <?php if($month==6) echo "selected";?>>June</option>
				<option value="07"  <?php if($month==7) echo "selected";?>>July</option>
				<option value="08"  <?php if($month==8) echo "selected";?>>August</option>
				<option value="09"  <?php if($month==9) echo "selected";?>>September</option>
				<option value="10" <?php if($month==10) echo "selected";?>>October</option>
				<option value="11" <?php if($month==11) echo "selected";?>>November</option>
				<option value="12" <?php if($month==12) echo "selected";?>>December</option>
			</select>
		</div>
		<div class="input-prepend">
			<input type="checkbox" id="monthYearOnly" class="add-on"/>
			<select name="day" id="day" disabled="disabled">
				<option value="01"  <?php if($day==1) echo "selected";?>>1</option>
				<option value="02"  <?php if($day==2) echo "selected";?>>2</option>
				<option value="03"  <?php if($day==3) echo "selected";?>>3</option>
				<option value="04"  <?php if($day==4) echo "selected";?>>4</option>
				<option value="05"  <?php if($day==5) echo "selected";?>>5</option>
				<option value="06"  <?php if($day==6) echo "selected";?>>6</option>
				<option value="07"  <?php if($day==7) echo "selected";?>>7</option>
				<option value="08"  <?php if($day==8) echo "selected";?>>8</option>
				<option value="09"  <?php if($day==9) echo "selected";?>>9</option>
				<option value="10" <?php if($day==10) echo "selected";?>>10</option>
				<option value="11" <?php if($day==11) echo "selected";?>>11</option>
				<option value="12" <?php if($day==12) echo "selected";?>>12</option>
				<option value="13" <?php if($day==13) echo "selected";?>>13</option>
				<option value="14" <?php if($day==14) echo "selected";?>>14</option>
				<option value="15" <?php if($day==15) echo "selected";?>>15</option>
				<option value="16" <?php if($day==16) echo "selected";?>>16</option>
				<option value="17" <?php if($day==17) echo "selected";?>>17</option>
				<option value="18" <?php if($day==18) echo "selected";?>>18</option>
				<option value="19" <?php if($day==19) echo "selected";?>>19</option>
				<option value="20" <?php if($day==20) echo "selected";?>>20</option>
				<option value="21" <?php if($day==21) echo "selected";?>>21</option>
				<option value="22" <?php if($day==22) echo "selected";?>>22</option>
				<option value="23" <?php if($day==23) echo "selected";?>>23</option>
				<option value="24" <?php if($day==24) echo "selected";?>>24</option>
				<option value="25" <?php if($day==25) echo "selected";?>>25</option>
				<option value="26" <?php if($day==26) echo "selected";?>>26</option>
				<option value="27" <?php if($day==27) echo "selected";?>>27</option>
				<option value="28" <?php if($day==28) echo "selected";?>>28</option>
				<option value="29" <?php if($day==29) echo "selected";?>>29</option>
				<option value="30" <?php if($day==30) echo "selected";?>>30</option>
				<option value="31" <?php if($day==31) echo "selected";?>>31</option>
			</select>
		</div>
		<button type="submit" class="btn btn-primary" data-loading-text="Loading ..." data-default-text="GO!">GO!</button>
	</form>
	<table id="summaryTable" class="table table-hover">
	</table>
</div>