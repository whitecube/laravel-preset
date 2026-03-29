export default class Video {
    static selector = ".video";

    constructor(el) {
        this.el = el;
        this.getElements();
        this.setEvents();
        this.player = null;
        this.playerReady = false;

        this.initIframe();
    }

    getElements() {
        this.overlay = this.el.querySelector(".video__overlay-container");
        this.playButton = this.el.querySelector(".video .icon-button");
        this.videoIframe = this.el.querySelector(".video__iframe");
    }

    setEvents() {
        this.playButton.addEventListener("click", (e) => {
            e.preventDefault();
            this.toggleVideo();
        });
    }

    initIframe() {
        const tag = document.createElement("script");
        tag.src = "https://www.youtube.com/iframe_api";
        const firstScriptTag = document.getElementsByTagName("script")[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    }

    loadIframe() {
        this.player = new YT.Player("player", {
            height: "360",
            width: "640",
            videoId: this.el.dataset.videoId,
            events: {
                onReady: this.onPlayerReady,
                onStateChange: this.onPlayerStateChange,
            },
        });
    }

    toggleVideo() {
        if (!this.player || !this.playerReady) return;

        this.overlay.classList.add("video__overlay-container--playing");

        this.player.playVideo();
    }

    onPlayerReady = (event) => {
        this.playerReady = true;
    };

    onPlayerStateChange = (event) => {
        if (event.data === YT.PlayerState.ENDED) {
            this.overlay.classList.remove("video__overlay-container--playing");
        }
    };
}

function onYouTubeIframeAPIReady() {
    window.app.pluton.call(".video", "loadIframe");
}

window.onYouTubeIframeAPIReady = onYouTubeIframeAPIReady;
