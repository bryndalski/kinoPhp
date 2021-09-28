class PageGenderer {
  constructor() {
    this.getMovies();
    this.movies = [];
  }

  async getMovies() {
    fetch("/kino/backend/filmy.php")
      .then((v) => v.json())
      .then((x) => {
        this.movies = this.formatData(x);
        this.movies.forEach((e) =>
          this.renderCinemaBox(
            "http://localhost/kino",
            e.movie,
            e.times,
            e.cover
          )
        );
      });
  }

  formatData(data) {
    let films = [
      ...new Set(
        data.map((e) => JSON.stringify({ movie: e.movie, cover: e.cover }))
      ),
    ];
    films = films.map((e) => JSON.parse(e));
    films = films.map((element) => {
      let movies = data.filter((film) => film.movie == element.movie);
      movies = movies.map((film) => ({ day: film.day, time: film.time }));
      return {
        ...element,
        times: [...movies],
      };
    });
    return films;
  }

  timesMaker(url, movie, times) {
    let toReturn = "";
    times.forEach((element) => {
      toReturn += `<a href="${url}?time=${element.time}&day=${element.day}&movie=${movie}" class="btn m--1 btn--orange btn--round">
              <b>${element.day}: </b><span>${element.time}</span>
            </a>`;
    });
    return toReturn;
  }

  renderCinemaBox(url, title, times, cover) {
    let cinemaItem = `<div class="cinemaItem">
        <img src="${cover}" alt="" />
        <div class="sizes--big">
          <h1 class="text--orange">${title}</h1>
          <div class="d--flex flex--row flex--wrap">
            ${this.timesMaker(url, title, times)}
          </div>    
        </div>
      </div>`;
    document.querySelector(".cinemaMovies").innerHTML += cinemaItem;
  }
}

new PageGenderer();
