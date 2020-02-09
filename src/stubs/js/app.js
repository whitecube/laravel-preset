import Pluton from 'whitecube-pluton';

class App {

    constructor() {
        this.initPluton();
    }

    initPluton() {
        this.pluton = new Pluton();
    }

}

window.addEventListener('load', () => {
    window.app = new App();
});
