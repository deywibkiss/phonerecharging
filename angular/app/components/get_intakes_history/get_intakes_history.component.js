class GetIntakesHistoryController{
    constructor(API){
        'ngInject';

        this.API = API;
    }

    $onInit(){
        this.getAll();
    }

    getAll(){

        this.API.all('intakes').getList().then((intakes) => {
          
          this.intakes = intakes;

        }, function(error){
            console.log(error);
        });
    }
}

export const GetIntakesHistoryComponent = {
    templateUrl: './views/app/components/get_intakes_history/get_intakes_history.component.html',
    controller: GetIntakesHistoryController,
    controllerAs: 'gi',
    bindings: {intakes: '='}
}
