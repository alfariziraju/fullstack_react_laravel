import React, { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';
import axios from 'axios';

function MahasiswaList() {
    const [mahasiswas, setMahasiswas] = useState([]);

    useEffect(() => {
        axios.get('http://localhost:8000/api/mahasiswas')
            .then((response) => {
                if (Array.isArray(response.data)) {
                    setMahasiswas(response.data);
                } else {
                    console.error('Invalid data format:', response.data);
                }
            })
            .catch((error) => {
                console.error('Error fetching data:', error);
            });
    }, []);

    const handleDelete = async (nim) => {
        try {
            await axios.delete(`http://localhost:8000/api/mahasiswas/${nim}`);
            setMahasiswas(mahasiswas.filter((mahasiswa) => mahasiswa.nim !== nim));
        } catch (error) {
            console.error('Error deleting mahasiswa:', error);
        }
    };

    return (
        <div>
            <h2>Daftar Mahasiswa</h2>
            <Link to="/add" className="btn btn-primary mb-3">Tambah Mahasiswa</Link>
            <table className="table">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {mahasiswas.map((mahasiswa) => (
                        <tr key={mahasiswa.nim}>
                            <td>{mahasiswa.nim}</td>
                            <td>{mahasiswa.nama}</td>
                            <td>
                                <Link to={`/edit/${mahasiswa.nim}`} className="btn btn-warning me-2">Edit</Link>
                                <button
                                    className="btn btn-danger"
                                    onClick={() => handleDelete(mahasiswa.nim)}
                                >
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
}

export default MahasiswaList;
