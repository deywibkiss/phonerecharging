import {GetRechargesHistoryComponent} from './app/components/get_recharges_history/get_recharges_history.component';
import {CreateRechargeFormComponent} from './app/components/create_recharge_form/create_recharge_form.component';
import {CreateCostFormComponent} from './app/components/create_cost-form/create_cost-form.component';
import {CreatePostFormComponent} from './app/components/create_post_form/create_post_form.component';
import {AppHeaderComponent} from './app/components/app-header/app-header.component';
import {AppRootComponent} from './app/components/app-root/app-root.component';
import {AppShellComponent} from './app/components/app-shell/app-shell.component';
import {ResetPasswordComponent} from './app/components/reset-password/reset-password.component';
import {ForgotPasswordComponent} from './app/components/forgot-password/forgot-password.component';
import {LoginFormComponent} from './app/components/login-form/login-form.component';
import {RegisterFormComponent} from './app/components/register-form/register-form.component';

angular.module('app.components')
	.component('getRechargesHistory', GetRechargesHistoryComponent)
	.component('createRechargeForm', CreateRechargeFormComponent)
	.component('createCostForm', CreateCostFormComponent)
	.component('createPostForm', CreatePostFormComponent)
	.component('appHeader', AppHeaderComponent)
	.component('appRoot', AppRootComponent)
	.component('appShell', AppShellComponent)
	.component('resetPassword', ResetPasswordComponent)
	.component('forgotPassword', ForgotPasswordComponent)
	.component('loginForm', LoginFormComponent)
	.component('registerForm', RegisterFormComponent);

