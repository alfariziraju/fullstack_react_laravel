import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';

function AddMahasiswa() {
    const [formData, setFormData] = useState({
        nim: '',
        nama: '',
        alamat: '',
        tanggal_lahir: '',
        jurusan: '',
    });

    const navigate = useNavigate();

    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        try {
            await fetch('http://localhost:8000/api/mahasiswas', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(formData),
            });
            navigate('/');
        } catch (error) {
            console.error('Error adding mahasiswa:', error);
        }
    };

    return (
        <div>
            <h2>Tambah Mahasiswa</h2>
            <form onSubmit={handleSubmit}>
                <input name="nim" placeholder="NIM" onChange={handleChange} required />
                <input name="nama" placeholder="Nama" onChange={handleChange} required />
                <textarea name="alamat" placeholder="Alamat" onChange={handleChange} required />
                <input type="date" name="tanggal_lahir" onChange={handleChange} required />
                <input name="jurusan" placeholder="Jurusan" onChange={handleChange} required />
                <button type="submit" className="btn btn-success mt-2">Submit</button>
            </form>
        </div>
    );
}

export default AddMahasiswa;
