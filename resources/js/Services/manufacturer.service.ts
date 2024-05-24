import axios from "axios";

const BASEURL :string = '/manufacturer'
class ManufacturerService {
    async getAll(){
        return await axios.get(BASEURL + '/all')
            .then(response => response)
    }
}

export default new ManufacturerService()
