import axios from "axios";

const BASEURL = '/status'
class StatusService {
    async getAll() {
        return await axios.get(BASEURL + '/all')
            .then(response => response)
    }
}

export default new StatusService()
