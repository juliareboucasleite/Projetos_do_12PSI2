using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using Dapper;

namespace Escola
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void label3_Click(object sender, EventArgs e)
        {

        }

        private void label4_Click(object sender, EventArgs e)
        {

        }

        private void DataNascimento_ValueChanged(object sender, EventArgs e)
        {

        }

        private void Form1_Load(object sender, EventArgs e)
        {
            // Obter o número de alunos na base de dados
            using (var connection = new MySqlConnection(LigacaoDB.GetConnectionString()))
            {
                int n = connection.ExecuteScalar<int>("SELECT COUNT(*) FROM alunos");

                NumeroRegistos.Text = $"{n} alunos";
            }
        }
    }
}
