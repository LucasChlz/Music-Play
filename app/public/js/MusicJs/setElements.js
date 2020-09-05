import { convertSeconds } from './helper.js';

export default {
    set() {
        this.title = document.querySelector('#title');
        this.artist = document.querySelector('#artist');
        this.audio = document.querySelector('#audio');
        this.skip = document.querySelector('#skip');
        this.back = document.querySelector('#back');
        this.play = document.querySelector('#play');
        this.mute = document.querySelector('#mute');
        this.currentDuration = document.querySelector('#current_time');
        this.totalTime = document.querySelector('#total_time');
        this.timeBar = document.querySelector('#timeBar');
        this.vol = document.querySelector('#vol');
        this.image = document.querySelector('#music_image');
    },
    elementActions() {
        this.audio.ontimeupdate = () => this.updateBar();

        this.skip.onclick = () => this.nextSong();
        this.back.onclick = () => this.backSong();
        this.play.onclick = () => this.playSong();
        this.mute.onclick = () => this.muteSong();

        this.vol.oninput = () => this.changeVolume(this.vol.value);
        this.vol.onchange = () => this.changeVolume(this.vol.value);

        this.timeBar.oninput = () => this.updateTimeBar(this.timeBar.value);
        this.timeBar.onchange = () => this.updateTimeBar(this.timeBar.value);
        this.timeBar.max = this.audio.duration;

        this.totalTime.innerText = convertSeconds(this.audio.duration);
        this.audio.onended = () => this.nextSong();
    }
}