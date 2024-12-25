import React, { useState, useEffect } from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import axios from 'axios'; // Import axios

function EditMahasiswa() {
    const { nim } = useParams(); // Ambil NIM dari URL params
    const [formData, setFormData] = useState({});
    const navigate = useNavigate();

    useEffect(() => {
        // Periksa jika nim tersedia dan valid
        if (!nim) {
            console.error('NIM tidak ditemukan');
            return;
        }

        // Mengambil data mahasiswa berdasarkan NIM menggunakan axios
        axios.get(`http://localhost:8000/api/mahasiswas/${nim}`)
            .then((response) => {
                console.log(response.data); // Menampilkan data yang diterima dari API
                setFormData(response.data); // Menyimpan data ke state formData
            })
            .catch((error) => {
                console.error('Error fetching mahasiswa:', error);
            });
    }, [nim]);

    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        try {
            await axios.put(`http://localhost:8000/api/mahasiswas/${nim}`, formData, {
                headers: { 'Content-Type': 'application/json' }
            });
            navigate('/'); // Arahkan kembali ke halaman utama setelah update
        } catch (error) {
            console.error('Error updating mahasiswa:', error);
        }
    };

    return (
        <div>
            <h2>Edit Mahasiswa</h2>
            <form onSubmit={handleSubmit}>
                <div>
                    <label>NIM</label>
                    <input 
                        name="nim" 
                        value={formData.nim || ''} 
                        onChange={handleChange} 
                        required 
                        disabled 
                    />
                </div>
                <div>
                    <label>Nama</label>
                    <input 
                        name="nama" 
                        value={formData.nama || ''} 
                        onChange={handleChange} 
                        required 
                    />
                </div>
                <div>
                    <label>Alamat</label>
                    <textarea 
                        name="alamat" 
                        value={formData.alamat || ''} 
                        onChange={handleChange} 
                        required 
                    />
                </div>
                <div>
                    <label>Tanggal Lahir</label>
                    <input 
                        type="date" 
                        name="tanggal_lahir" 
                        value={formData.tanggal_lahir || ''} 
                        onChange={handleChange} 
                        required 
                    />
                </div>
                <div>
                    <label>Jurusan</label>
                    <input 
                        name="jurusan" 
                        value={formData.jurusan || ''} 
                        onChange={handleChange} 
                        required 
                    />
                </div>
                <button type="submit" className="btn btn-success mt-2">Update</button>
            </form>
        </div>
    );
}

export default EditMahasiswa;
