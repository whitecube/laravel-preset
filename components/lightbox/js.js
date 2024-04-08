export default class Lightbox {
    static selector = ".lightbox";

    constructor(el) {
        this.el = el;
        this.getElements();
        this.setEventListeners();
    }

    getElements() {
        this.name = this.el.getAttribute("id");
        this.closeElement = this.el.querySelector(".lightbox__close");
        this.openElement = document.querySelector(
            `[data-lightbox="${this.name}"]`,
        );
    }

    setEventListeners() {
        this.el.addEventListener("click", (e) => this.close(e));

        this.closeElement.addEventListener("click", (e) => this.close(e));

        this.openElement.addEventListener("click", (e) => this.open(e));

        this.el.addEventListener("animationend", (e) => {
            if (e.animationName === "fade-out") {
                this.el.style = "display: none";
            }
        });

        window.addEventListener('keydown', (e) => {
            if (this.isOpen() && e.key === 'Escape') {
                this.close(e, true);
            }
        });
    }

    isOpen() {
        return this.el.classList.contains('lightbox--open');
    }

    close(e, isWindowEvent = false) {
        e.preventDefault();

        if (e.target != this.el && e.target != this.closeElement && !isWindowEvent) {
            return;
        }

        this.el.classList.remove("lightbox--open");
        this.el.classList.add("lightbox--closed");
    }

    open(e) {
        e.preventDefault();
        this.el.style = "display: block";
        this.el.classList.remove("lightbox--closed");
        this.el.classList.add("lightbox--open");
    }
}
