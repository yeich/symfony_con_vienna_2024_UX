import {Controller} from "@hotwired/stimulus";

export default class extends Controller {

    static targets = ['charcounter', 'message', 'maxcharcount'];

    charcounterUpdate() {
        this.charcounterTarget.textContent = parseInt(this.maxcharcountTarget.textContent) - parseInt(this.messageTarget.value.length);
    }
}