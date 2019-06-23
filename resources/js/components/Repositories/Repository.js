import axios from 'axios'
import {API_PREFIX} from "../../config";

export default axios.create({
    baseURL: API_PREFIX
});
