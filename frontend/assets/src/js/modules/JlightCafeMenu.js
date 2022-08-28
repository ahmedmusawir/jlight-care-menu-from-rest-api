import $ from 'jquery';
import axios from 'axios';

class JlightCafeMenu {
  constructor() {
    this.BASE_URL = 'http://localhost:10004/wp-json/wp/v2';
    this.menuItems;

    // COLLECTING ELEMENTS
    this.col2 = $('#COLUMN-2');
    this.col3 = $('#COLUMN-3');
    this.getDataBtn = $('#get-data-btn');

    this.init();
    this.getData();
    this.setEvents();
  }

  init = () => {
    console.info('Jlight Cafe Menu Initialized ON THE WP FRONTEND');
  };

  getData = async () => {
    try {
      const response = await axios.get(`${this.BASE_URL}/posts?categories=415`);

      this.menuItems = response.data;

      console.log(`GET: Here's the list of menus`, this.menuItems);
      this.displayDataOnPageLoad();

      // return menuItems;
    } catch (errors) {
      console.error(errors);
    }
  };

  displayDataOnPageLoad = () => {
    this.menuItems.map((data) => {
      console.log(data.content.rendered);
      const htmlContent = `
       <h5 class="text-danger">${data.title.rendered}</h5>
        <small>
          ${data.content.rendered}
        </small>
      `;
      this.col3.append(htmlContent);
    });
  };

  setEvents = () => {
    this.getDataBtn.on('click', this.displayDataHandler);
  };

  displayDataHandler = () => {
    this.menuItems.map((data) => {
      console.log(data.content.rendered);
      const htmlContent = `
       <h5 class="text-danger">${data.title.rendered}</h5>
        <small>
          ${data.content.rendered}
        </small>
      `;
      this.col2.append(htmlContent);
    });
  };
}

export default JlightCafeMenu;
