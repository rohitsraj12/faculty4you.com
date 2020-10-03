<div class="header-search">
    <form action="<?php base_url();?>student/search_result.php" method="POST" class="header-search__form form-field">    
        <input type="text" name="search" placeholder="Search: Subject (academic) / Activity (non-academic)"  class="header-search__input  search_subject" >
        <div class="subject-list" id="subjectList"></div>
        <button type="submit" name="submit-search" class="header-search__button" ><i class="fa fa-search"aria-hidden="true"></i></button>
    </form>
</div>