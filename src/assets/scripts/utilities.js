export class Utilities {

  constructor(env) {
    this.env = env || 'DEV';
  }

  getPostData (method, dataURL, callback, ...params) {

    let promise = new Promise((resolve, reject) => {

      let queryParams = '',
          count = 0;

      if (params) {

        params.forEach(param => {
          if (count === 0) {
            queryParams = `?${param}`;
          } else {
            queryParams += `&${param}`;
          }

          count++;
        });
      }

      console.log(queryParams); // eslint-disable-line no-console

      const xhr = new XMLHttpRequest();

      xhr.onload = () => {

        let response;

        if (xhr.status === 200) {
          response = JSON.parse(xhr.response);

          if (response.error) {
            reject(`Sorry, there was an error.`);
          }

          resolve(response);
        }
      };

      xhr.onerror = () => reject(`Sorry, there was an error.`);

      xhr.open(method, dataURL + queryParams);
      xhr.send();
    });

    promise.then(
      result => {
        callback(result);
      },
      error => {
        console.log(error); // eslint-disable-line no-console
      }
    )
  }
}
