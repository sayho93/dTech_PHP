<?php

$MENU_CONSTS = array(
    "ko" => array(
        "web_title" => "듀라텍",
        "menu_main" => "메인",
        "menu_motor" => "모터 추가",
        "menu_emit" => "점멸 주기 설정",
        "menu_locale" => "언어 설정",
        "side_lock" => "사이드 메뉴 잠금",
        "side_lock_release" => "사이드 메뉴 잠금 해제",
        "alerts" => array(
            "logout" => "로그아웃되었습니다.",
            "saved" => "저장되었습니다."
        ),
        "buttons" => array(
            "confirm" => "확인",
            "cancel" => "취소"
        )
    ),
    "en" => array(
        "web_title" => "Duratech",
        "menu_main" => "Main",
        "menu_motor" => "Add motor",
        "menu_emit" => "Emit Period Setting",
        "menu_locale" => "Language Setting",
        "side_lock" => "Lock SideMenu",
        "side_lock_release" => "Unlock SideMenu",
        "alerts" => array(
            "logout" => "logged out successfully.",
            "saved" => "Saved successfully."
        ),
        "buttons" => array(
            "confirm" => "Confirm",
            "cancel" => "Cancel"
        )
    )
);

$currentLoc = $loginInfo["loc"];
if($currentLoc == "") $currentLoc = "ko";

$locMap = $MENU_CONSTS[$currentLoc];

?>