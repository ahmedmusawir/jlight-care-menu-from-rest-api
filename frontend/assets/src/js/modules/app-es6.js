import $ from 'jquery';
import JlightCafeMenu from './JlightCafeMenu';
class App {
  constructor() {
    this.init();
  }

  init = () => {
    console.info('App Initialized ON THE WP FRONTEND');
    // COMMISSION CALCULATOR MODULE LOADED
    new JlightCafeMenu();
  };
}

export default App;
