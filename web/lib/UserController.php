<?php

class UserController extends UserView {

    public function UserController ($model,$getvars=null) {
        UserView::UserView($model);
        $this->header();

		

        switch ( $getvars['view'] ) {
            case "user":
                $this->userItem($getvars['id']);
		        break;
            default:
                if ( empty ($getvars['rownum']) ) {
                    $this->userTable();
                } else {
                    $this->userTable($getvars['rownum']);
                }
				//echo "ussss;";
                
                break;
        }

        $this->footer();
    }
}

?>