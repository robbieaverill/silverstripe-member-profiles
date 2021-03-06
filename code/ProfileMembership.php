<?php

/*
 * Member Profile Page
 * @author Anton Fedianin aka Tony Air <tony@twma.pro>
 * https://tony.twma.pro/
 *
*/

class ProfileMembership extends ProfileController
{
    private static $menu_icon = '<i class="fa fa-pencil-square-o"></i>';
    private static $menu_title = 'Edit Profile';

    private static $allowed_actions = [
        'index' => true,
        'MemberEditProfileForm' => '->canEditProfile',
    ];

    private static $url_handlers = [
        'MemberEditProfileForm' => 'MemberEditProfileForm',
    ];

    private static $action_template = 'ProfileMembership';

    public function MemberEditProfileForm()
    {
        return MemberEditProfileForm::create($this, 'MemberEditProfileForm', $this->getMember());
    }

    public function canEditProfile()
    {
        return $this->getMember()->canEdit(Member::currentUser());
    }
}
