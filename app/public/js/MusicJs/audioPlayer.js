import setElements from './setElements.js';
import { convertSeconds } from './helper.js';

export default {
    path: path,
    audioData: listSongs,
    currentSong: {},
    songNumber: songNumber,
    isPlaying: false,
    isMuted: false,
    start() {
        this.updateSong();        
    },
    updateSong() {
        setElements.set.call(this);

        this.currentSong = this.audioData[this.songNumber];

        this.title.innerHTML = this.currentSong.name;
        this.image.src = `${this.path}image/${this.currentSong.image}`;
        this.artist.innerHTML = `Artist - ${this.currentSong.artist}`;

        this.audio.src = `${this.path}music/${this.currentSong.name}.mp3`;

        this.audio.onloadeddata = () => {
            setElements.elementActions.call(this);
        }
    },
    nextSong() {
        if (this.songNumber == this.audioData.length - 1) {
            this.resetPlaylist();
        } else {
            this.songNumber++;
            console.log(this.songNumber);
            this.isPlaying = true;
            this.play.innerHTML = 'Stop';
            this.audio.autoplay = true;
            this.start();
        }
    },
    backSong() {
        if (this.songNumber == 0) {
            this.songNumber = this.audioData.length - 1;
            this.start();
        } else {
            this.songNumber--;
            this.audio.autoplay = true;
            this.start();
        }
    },
    playSong() {
        if (this.isPlaying == false) {
            this.play.innerHTML = 'Stop';
            this.audio.play();
            this.isPlaying = true;
        } else {
            this.play.innerHTML = 'Play';
            this.audio.pause();
            this.isPlaying = false;
        }
    },
    muteSong() {
        if (this.isMuted) {
            this.mute.innerText = 'volume_up';
            this.audio.muted = false;
            this.isMuted = false;
        } else {
            this.mute.innerText = 'volume_off';
            this.audio.muted = true;
            this.isMuted = true;
        }
    },
    changeVolume(value) {
        this.audio.volume = value / 100;
    },
    updateBar() {
        this.currentDuration.innerText = convertSeconds(this.audio.currentTime);
        this.timeBar.value = this.audio.currentTime;
    },
    updateTimeBar(value) {
        this.audio.currentTime = value;
    },
    resetPlaylist() {
        this.songNumber = 0;
        this.isPlaying = true;
        this.play.innerHTML = 'Stop';
        this.audio.autoplay = true;
        this.start();
    },

}