// @ts-nocheck
class roomMaker {
  constructor() {
    this.sites = [];
    this.room = document.querySelector(".sits");
    this.reserved = [];
    this.render();
    this.init();
  }
  async init() {
    await fetch("/projekt_kino/backend/isLoggedIn.php")
      .then((v) => v.json())
      .then((v) => {
        console.log(v);
        // if (!v[0].loggedIn) location.href = "/projekt_kino/login.php";
      });

    fetch("/projekt_kino/backend/sits.php")
      .then((v) => v.json())
      .then((d) => (this.reserved = d));
    console.log(await this.reserved);
  }

  render() {
    for (let i = 0; i < 15; i++) {
      this.sites[i] = [];
      let container = document.createElement("div");
      let row = document.createElement("span");
      row.innerText = i + 1;
      container.appendChild(row);
      for (let j = 0; j < 20; j++) {
        let sit = document.createElement("div");
        console.log("es");
        this.sites.push(sit);
        sit.classList.add("sit", "sit--free");
        container.appendChild(sit);
      }
      this.room.appendChild(container);
    }
  }

  forbid() {}
}

new roomMaker();
ub123
