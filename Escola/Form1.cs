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
        /// <summary>Dados dos alunos. </summary>
        private List<Aluno> Alunos;
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
            // Inicializar a ListView
            ListaAlunos.View = View.Details;
            ListaAlunos.FullRowSelect = true;
            ListaAlunos.Columns.Add("Processo", 60, HorizontalAlignment.Left);
            ListaAlunos.Columns.Add("Número", 50, HorizontalAlignment.Left);
            ListaAlunos.Columns.Add("Nome", 120, HorizontalAlignment.Left);
            ListaAlunos.Columns.Add("Data Nascimento", -2, HorizontalAlignment.Left);

            // Obter o número de alunos na base de dados
            using (var connection = new MySqlConnection(LigacaoDB.GetConnectionString()))
            {
                int n = connection.ExecuteScalar<int>("SELECT COUNT(*) FROM alunos");

                NumeroRegistos.Text = $"{n} alunos";
            }
            Inicializar();
        }

        /// <summary>
        /// Inicializar os controlos da form.
        /// </summary>
        private void Inicializar()
        {
            // Obter o número de alunos na base de dados
            using (var connection = new MySqlConnection(LigacaoDB.GetConnectionString()))
            {
                int n = connection.ExecuteScalar<int>("SELECT COUNT(*) FROM alunos");
                NumeroRegistos.Text = $"{n} alunos";

                // Obter dados dos alunos
                var sql = "SELECT * FROM alunos";
                Alunos = connection.Query<Aluno>(sql).ToList();
                foreach (Aluno a in Alunos)
                {
                    ListViewItem item = new ListViewItem(new string[] {
                a.NumeroProcesso.ToString(), a.Numero.ToString(), a.Nome, a.DataNascimento.ToString("dd/MM/yyyy") });
                    ListaAlunos.Items.Add(item);
                }
            }


        }
        /// <summary>
        /// O utilizador clicou num item na lista de alunos.
        /// </summary>
        private void ListaAlunos_SelectedIndexChanged(object sender, EventArgs e)
        {
            if (ListaAlunos.SelectedItems.Count > 0)
            {
                // Obter o número de processo do aluno selecionado
                BindAluno(int.Parse(ListaAlunos.SelectedItems[0].SubItems[0].Text));
            }
        }

        /// <summary>
        /// Colocar nos controlos os dados de um aluno.
        /// </summary>
        /// <param name="numeroProcesso">O número de processo de um aluno.</param>
        private void BindAluno(int numeroProcesso)
        {
            // Encontrar o aluno com base no seu número de processo
            Aluno aluno = Alunos.Find(x => x.NumeroProcesso == numeroProcesso);

            // Verificar se existe o aluno
            if (aluno != null)
            {
                IdAluno.Text = aluno.ID.ToString();
                NumeroProcesso.Text = aluno.NumeroProcesso.ToString();
                NumeroAluno.Text = aluno.Numero.ToString();
                Nome.Text = aluno.Nome;
                Morada.Text = aluno.Morada;
                CodigoPostal.Text = aluno.CodigoPostal;
                Email.Text = aluno.Email;
                DataNascimento.Value = aluno.DataNascimento;
            }
        }

    }
}
