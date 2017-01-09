class GetRechargesHistoryController{
    constructor(API){
        'ngInject';

        this.API = API;
    }

    $onInit(){
        this.getAll();
    }

    getAll(){

        this.API.all('recharges').getList().then((recharges) => {
          
          this.recharges = recharges;

        }, function(error){
            console.log(error);
        });
    }
}

export const GetRechargesHistoryComponent = {
    templateUrl: './views/app/components/get_recharges_history/get_recharges_history.component.html',
    controller: GetRechargesHistoryController,
    controllerAs: 'gr',
    bindings: {recharges: '='}
}
