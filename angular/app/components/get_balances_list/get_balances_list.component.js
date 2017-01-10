class GetBalancesListController{
    constructor(API){
        'ngInject';

        this.API = API;
    }

    $onInit(){
        this.getAll();
    }

    getAll(){

        this.API.all('balances').getList().then((balances) => {
          
          this.balances = balances;

        }, function(error){
            console.log(error);
        });
    }
}

export const GetBalancesListComponent = {
    templateUrl: './views/app/components/get_balances_list/get_balances_list.component.html',
    controller: GetBalancesListController,
    controllerAs: 'gb',
    bindings: {}
}
