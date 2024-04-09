export default class Faq {
    static selector = ".faq__question";

    constructor(el) {
        this.el = el;
        this.setEvents();
    }

    setEvents() {
        document.body.addEventListener("click", (e) => {
            if (this.el.parentElement.contains(e.target)) {
                return;
            }

            this.el.removeAttribute("open");
        });
    }
}
