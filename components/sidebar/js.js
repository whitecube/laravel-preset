export default class Sidebar {
    static selector = ".sidebar";

    constructor(el) {
        this.el = el;
        this.getElements();
        this.setEventListeners();
    }

    getElements() {
        this.name = this.el.getAttribute("id");
        this.closeElement = this.el.querySelector(".sidebar__close");
        this.openElement = document.querySelector(
            `[data-sidebar="${this.name}"]`,
        );
    }

    setEventListeners() {
        this.el.addEventListener("click", (e) => this.close(e));

        this.el.addEventListener("animationend", (e) => {
            if (e.animationName === "fade-out") {
                this.el.style = "display: none";
            }
        });

        this.closeElement.addEventListener("click", (e) => this.close(e));

        this.openElement.addEventListener("click", (e) => this.open(e));

        window.addEventListener("keydown", (e) => {
            if (this.isOpen() && e.key === "Escape") {
                this.close(e, true);
            }
        });
    }

    isOpen() {
        return this.el.classList.contains("sidebar--open");
    }

    close(e, isWindowEvent) {
        e.preventDefault();

        if (
            e.target != this.el &&
            e.target != this.closeElement &&
            !isWindowEvent
        ) {
            return;
        }

        this.el.classList.remove("sidebar--open");
        this.el.classList.add("sidebar--closed");
    }

    open(e) {
        e.preventDefault();
        this.el.style = "display: block";
        this.el.classList.remove("sidebar--closed");
        this.el.classList.add("sidebar--open");
    }
}
