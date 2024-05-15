// import axios from 'axios';
// import authHeader from './auth-header';
//
// const API_URL = 'http://localhost:8080/api/test/';
//
// class UserService {
//     getPublicContent() {
//         return axios.get(API_URL + 'all');
//     }
//
//     getUserBoard() {
//         return axios.get(API_URL + 'user', { headers: authHeader() });
//     }
//
//     getModeratorBoard() {
//         return axios.get(API_URL + 'mod', { headers: authHeader() });
//     }
//
//     getAdminBoard() {
//         return axios.get(API_URL + 'admin', { headers: authHeader() });
//     }
// }
// export default new UserService();

/** Import des modules nécessaires */
import Axios from './caller.service'


let getAllUsers = () => {
    return Axios.get('/users')
}

let getUser = (uid) => {
    return Axios.get('/users/'+uid)
}

let updateUser = (user) => {
    return Axios.patch('/users/'+user.id, user)
}

let createUser = (user) => {
    return Axios.put('/users', user)
}

let deleteUser = (uid) => {
    return Axios.delete('/users/'+uid)
}

export const userService = {
    getAllUsers,
    getUser,
    updateUser,
    createUser,
    deleteUser,
}