import angular from 'angular';

import Toolbar from './component/toolbar/toolbar.component';
import Login from './component/login/login.component';
import Register from './component/register/register.component';
import Home from './component/home/home.component';
import Profil from './component/profil/profil.component';
import Achievements from './component/achievements/achievements.component';
import Notifications from './component/notifications/notifications.component';
import Purposes from './component/purposes/purposes.component';

const moduleName = 'app.components';

angular
    .module(moduleName, [])
    .component('toolbar', Toolbar)
    .component('login', Login)
    .component('register', Register)
    .component('home', Home)
    .component('profil', Profil)
    .component('achievements', Achievements)
    .component('notifications', Notifications)
    .component('purposes', Purposes);

export default moduleName;
