import React from 'react';
import { createUseStyles } from 'react-jss';

// Style JSS
const useStyles = createUseStyles({
  table: {
    borderCollapse: 'collapse',
    width: '100%',
    marginTop: 20,
  },
  th: {
    border: '1px solid #dddddd',
    textAlign: 'left',
    padding: 8,
    background: '#009879',
    color: 'white',
  },
  td: {
    border: '1px solid #dddddd',
    textAlign: 'left',
    padding: 8,
  },
  container: {
    maxWidth: 800,
    margin: '0 auto',
  },
  title: {
    textAlign: 'center',
    marginTop: 20,
    color: '#333',
  },
});

// Data Dummy — sesuaikan dengan data yang ada di db_lugas Anda
const data = {
  cart: [
    { id: 1, item: 'Burger', quantity: 2 },
    { id: 2, item: 'Fries', quantity: 1 },
  ],
  kategori: [
    { id: 1, name: 'Makanan' },
    { id: 2, name: 'Minuman' },
  ],
  tbladmin: [
    { id: 1, username: 'admin1', role: 'superadmin' },
  ],
  tbl_menu: [
    { id: 1, nama_menu: 'Nasi Goreng', harga: 15000 },
    { id: 2, nama_menu: 'Es Teh', harga: 5000 },
  ],
  tbl_pengguna: [
    { id: 1, nama: 'Budi', email: 'budi@email.com' },
  ],
  tbl_pesanan: [
    { id: 1, id_pelanggan: 1, status: 'Pending' },
  ],
};

const Table = ({ title, columns, rows }) => {
  const classes = useStyles();
  return (
    <div>
      <h3>{title}</h3>
      <table className={classes.table}>
        <thead>
          <tr>
            {columns.map((col) => (
              <th key={col} className={classes.th}>{col}</th>
            ))}
          </tr>
        </thead>
        <tbody>
          {rows.length === 0 && (
            <tr>
              <td colSpan={columns.length} className={classes.td} style={{ textAlign: 'center' }}>
                No Data
              </td>
            </tr>
          )}
          {rows.map((row, idx) => (
            <tr key={idx}>
              {columns.map((col) => (
                <td key={col} className={classes.td}>{row[col.toLowerCase()] || '-'}</td>
              ))}
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
};

const App = () => {
  const classes = useStyles();

  return (
    <div className={classes.container}>
      <h2 className={classes.title}>Database db_lugas Tables</h2>

      <Table
        title="Cart"
        columns={['ID', 'Item', 'Quantity']}
        rows={data.cart.map(({ id, item, quantity }) => ({ id, item, quantity }))}
      />

      <Table
        title="Kategori"
        columns={['ID', 'Name']}
        rows={data.kategori.map(({ id, name }) => ({ id, name }))}
      />

      <Table
        title="Tbl Admin"
        columns={['ID', 'Username', 'Role']}
        rows={data.tbladmin.map(({ id, username, role }) => ({ id, username, role }))}
      />

      <Table
        title="Tbl Menu"
        columns={['ID', 'Nama_Menu', 'Harga']}
        rows={data.tbl_menu.map(({ id, nama_menu, harga }) => ({ id, nama_menu, harga }))}
      />

      <Table
        title="Tbl Pengguna"
        columns={['ID', 'Nama', 'Email']}
        rows={data.tbl_pengguna.map(({ id, nama, email }) => ({ id, nama, email }))}
      />

      <Table
        title="Tbl Pesanan"
        columns={['ID', 'Id_Pelanggan', 'Status']}
        rows={data.tbl_pesanan.map(({ id, id_pelanggan, status }) => ({ id, id_pelanggan, status }))}
      />
    </div>
  );
};

export default App;