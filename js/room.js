// @ts-nocheck
class roomMaker {
  constructor() {
    this.sites = [];
    this.room = document.querySelector(".container");
    this.reserved = [];
    this.render();
    this.init();
    this.reserved = [];
  }
  async init() {
    document.querySelector("button").addEventListener("click", this.reserve);
    fetch(`/kino/backend/sits.php${window.location.search}`)
      .then((v) => v.json())
      .then((d) => this.forbid(d));
    console.log(await this.reserved);
  }
  /**
   * Renders all sits and assign them to sitesArray
   */
  render() {
    for (let i = 0; i < 15; i++) {
      this.sites[i] = [];
      let container = document.createElement("div");
      container.classList.add(
        "d--flex",
        "flex--row",
        "flex--between",
        "text--orange",
        "m--1"
      );
      let row = document.createElement("span");
      let num = document.createElement("i");
      num.classList.add("text--orange", "d--block", "sit");
      num.innerText = i + 1;
      row.appendChild(num);
      container.appendChild(row);
      for (let j = 0; j < 20; j++) {
        let sit = document.createElement("div");
        sit.coords = { row: i, sit: j };
        this.sites[i].push(sit);
        sit.classList.add("sit", "border--orange", "sit--hover");
        sit.addEventListener("click", this.selectSit);

        container.appendChild(sit);
      }
      this.room.appendChild(container);
    }
  }
  /**
   * Adds item to array and change div → target style
   * @param {Event} e
   */
  selectSit = (e) => {
    if (this.reserved.includes(e.target.coords)) {
      e.target.classList.remove("sit--selected");
      e.target.classList.add("sit--hover");
      this.reserved.slice(
        this.reserved.findIndex(
          (e) => JSON.stringify(e) == JSON.stringify(e.target.coords)
        ),
        1
      );
    } else {
      this.reserved.push(e.target.coords);
      e.target.classList.add("sit--selected");
      e.target.classList.remove("sit--hover");
    }
  };

  /**
   *
   * @param {Array} toForbid
   * Forbids and remove event listeners from sits
   */
  forbid(toForbid) {
    toForbid.forEach((element) => {
      this.sites[element.row][element.sit].removeEventListener(
        "click",
        this.selectSit
      );
      this.sites[element.row][element.sit].addEventListener("click", () =>
        alert("Sory byq nie widzisz youg leosi")
      );
      this.sites[element.row][element.sit].classList.add("sit--cover");
      this.sites[element.row][element.sit].classList.remove("sit--hover");
    });
  }

  reserve() {
    fetch("/kino/backend/reserve.php", {
      method: "POST",
      body: JSON.stringify({ reserved: this.reserved }),
    });
  }
}

new roomMaker();
