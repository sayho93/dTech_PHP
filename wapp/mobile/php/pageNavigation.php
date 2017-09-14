<div class="pager">
	<? 
	if( $json->isPrevBlock) 
	{
		echo '<a href="#" class="jPage" page="1"><<</a>';
		echo '<a href="#" class="pager_prev jPage" page="' . ($json->startBlock - 1) . '">이전</a>';
	}

	for($i = $json->startBlock ; $i <= $json->endBlock  ; $i++ )
	{ 			
		if( $json->page == $i ) 
			echo '<a href="#" class="select">'.$i.'</a>' ;
		else
			echo '<a href="#" class="jPage" page="'.$i.'">'.$i.'</a>' ;
	}

	if( $json->isNextBlock)
	{
		echo '<a href="#" class="pager_next jPage" page="' . ($json->endBlock + 1) . '">다음</a>';
		echo '<a href="#" class="jPage" page="' . ($json->endPage) . '">>></a>';
	}
	?>
</div>